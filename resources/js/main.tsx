import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Login from './components/Login';
import ProtectedRoute from './components/ProtectedRoute';

const App = () => (
  <BrowserRouter>
    <Routes>
      <Route path="/login" element={<Login />} />
      <Route
        path="/homepage-admin"
        element={
          <ProtectedRoute roles={["administrator"]}>
            <div>Admin Home</div>
          </ProtectedRoute>
        }
      />
    </Routes>
  </BrowserRouter>
);

ReactDOM.createRoot(document.getElementById('app') as HTMLElement).render(<App />);
