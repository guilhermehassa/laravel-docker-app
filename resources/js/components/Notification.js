// Notification function
export function showNotification(message) {
  // Remove existing notifications
  $('.notification').remove();
  
  // Create notification
  const notification = $(`
    <div class="notification" style="
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: var(--netflix-red);
      color: white;
      padding: 15px 25px;
      border-radius: 4px;
      font-size: 14px;
      z-index: 9999;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      opacity: 0;
      transform: translateX(100%);
      transition: all 0.3s ease;
    ">
        ${message}
    </div>
  `);
  
  $('body').append(notification);
  
  // Animate in
  setTimeout(() => {
    notification.css({
      opacity: 1,
      transform: 'translateX(0)'
    });
  }, 100);
  
  // Animate out and remove
  setTimeout(() => {
    notification.css({
      opacity: 0,
      transform: 'translateX(100%)'
    });
    
    setTimeout(() => {
      notification.remove();
    }, 300);
  }, 3000);
}
