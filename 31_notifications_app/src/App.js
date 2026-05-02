import React from "react";
import NotificationInput from "./components/NotificationInput";
import NotificationList from "./features/notifications/NotificationList";
import "./App.css";

function App() {
  return (
    <div className="app">
      <h1>Notification System</h1>
      <NotificationInput />
      <NotificationList />
    </div>
  );
}

export default App;