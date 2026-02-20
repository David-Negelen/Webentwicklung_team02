document.addEventListener('DOMContentLoaded', () => {
    const containers = Array.from(document.querySelectorAll('.tasks-container'));
    if (!containers.length) return;

    function updateEmptyMessages() {
        containers.forEach(col => {
            const emptyMessage = col.querySelector('.empty-message');
            const taskCards = col.querySelectorAll('.task-card');

            if (emptyMessage) {
                if (taskCards.length === 0) {
                    emptyMessage.style.display = '';
                } else {
                    emptyMessage.style.display = 'none';
                }
            }

            const badge = col.closest('.card').querySelector('.badge');
            if (badge) {
                badge.textContent = taskCards.length;
            }
        });
    }

    const drake = dragula(containers, {
        moves: function (el, container, handle) {
            return el.classList.contains('task-card');
        },
        accepts: function (el, target, source, sibling) {
            if (sibling && sibling.classList.contains('empty-message')) {
                return false;
            }
            return true;
        }
    });

    function updateEmptyMessagesDuringDrag() {
        containers.forEach(col => {
            const emptyMessage = col.querySelector('.empty-message');
            if (!emptyMessage) return;

            const hasShadow = col.querySelector('.gu-transit');
            const taskCards = Array.from(col.querySelectorAll('.task-card')).filter(card => !card.classList.contains('gu-transit'));

            if (taskCards.length === 0 && !hasShadow) {
                emptyMessage.style.display = '';
            } else {
                emptyMessage.style.display = 'none';
            }
        });
    }

    drake.on('over', (el, container) => {
        updateEmptyMessagesDuringDrag();
    });

    drake.on('out', (el, container) => {
        setTimeout(() => {
            updateEmptyMessagesDuringDrag();
        }, 10);
    });

    drake.on('shadow', (el, container) => {
        updateEmptyMessagesDuringDrag();
    });

    drake.on('cancel', (el, container) => {
        containers.forEach(col => {
            const emptyMessage = col.querySelector('.empty-message');
            const taskCards = col.querySelectorAll('.task-card');
            if (emptyMessage && taskCards.length === 0) {
                emptyMessage.style.display = '';
            }
        });
    });

    drake.on('drop', async () => {
        updateEmptyMessages();

        const updates = [];

        containers.forEach(col => {
            const spaltenId = parseInt(col.dataset.spaltenId, 10);
            const cards = Array.from(col.querySelectorAll('.task-card'));

            cards.forEach((card, index) => {
                updates.push({
                    taskId: parseInt(card.dataset.taskId, 10),
                    spaltenId: spaltenId,
                    sortid: index + 1,
                });
            });
        });

        try {
            const res = await fetch('/public/tasks/update-positions', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ updates }),
            });

            const data = await res.json();
            if (!data.ok) {
                console.error(data);
                alert('Speichern fehlgeschlagen');
            }
        } catch (e) {
            console.error(e);
            alert('Netzwerkfehler beim Speichern');
        }
    });
});

