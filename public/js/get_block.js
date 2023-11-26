// Function to update iframe source based on the selected list
function updateBlockIframe(itemId) {
    const blockIframe = document.getElementById('blockIframe');
    blockIframe.src = `block.php?item_id=${itemId}`;
}

// Add a click event listener to list items
const Items = document.querySelectorAll('.item');
Items.forEach(Item => {
    Item.addEventListener('click', () => {
        const itemId = Item.getAttribute('data-itemid');
        updateBlockIframe(itemId);
    });
});