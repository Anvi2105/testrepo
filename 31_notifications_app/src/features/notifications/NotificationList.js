import React, { useEffect } from "react";
import { useSelector, useDispatch } from "react-redux";
import { removeNotification } from "./notificationSlice";

function NotificationList() {
  const notifications = useSelector(state => state.notifications);
  const dispatch = useDispatch();

  useEffect(() => {
    const timers = notifications.map(n =>
      setTimeout(() => dispatch(removeNotification(n.id)), 5000)
    );

    return () => timers.forEach(t => clearTimeout(t));
  }, [notifications, dispatch]);

  return (
    <div className="notification-container">
      {notifications.map((n) => (
        <div className={`notification ${n.type}`} key={n.id}>
          <span>{n.message}</span>
          <button onClick={() => dispatch(removeNotification(n.id))}>
            ✖
          </button>
        </div>
      ))}
    </div>
  );
}

export default NotificationList;