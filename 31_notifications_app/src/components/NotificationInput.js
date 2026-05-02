import React, { useState } from "react";
import { useDispatch } from "react-redux";
import { addNotification } from "../features/notifications/notificationSlice";

function NotificationInput() {
  const [message, setMessage] = useState("");
  const [type, setType] = useState("info");
  const dispatch = useDispatch();

  const handleAdd = () => {
    if (message.trim() !== "") {
      dispatch(addNotification({ message, type }));
      setMessage("");
    }
  };

  return (
    <div className="input-box">
      <input
        type="text"
        placeholder="Enter notification..."
        value={message}
        onChange={(e) => setMessage(e.target.value)}
      />

      <select value={type} onChange={(e) => setType(e.target.value)}>
        <option value="info">Info</option>
        <option value="success">Success</option>
        <option value="error">Error</option>
      </select>

      <button onClick={handleAdd}>Add</button>
    </div>
  );
}

export default NotificationInput;