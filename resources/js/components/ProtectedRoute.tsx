import React from 'react';
import { Navigate } from 'react-router-dom';

interface ProtectedRouteProps {
  roles?: string[];
  children: React.ReactElement;
}

const ProtectedRoute: React.FC<ProtectedRouteProps> = ({ roles, children }) => {
  const token = localStorage.getItem('his_token');
  const role = localStorage.getItem('his_role');

  if (!token || !role || (roles && !roles.includes(role))) {
    return <Navigate to="/login" replace />;
  }

  return children;
};

export default ProtectedRoute;
