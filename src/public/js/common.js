// .notification .delete ボタンクリックで削除
document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
      $notification = $delete.parentNode;
      $delete.addEventListener('click', () => {
        $notification.parentNode.removeChild($notification);
      });
    });
  });

function confirmDelete(target)
{
    let message = `「${target}」を削除してもよろしいですか？`;
    return confirm(message);
}
