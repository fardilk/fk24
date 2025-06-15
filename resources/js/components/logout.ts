export function logout() {
  localStorage.removeItem('his_token');
  localStorage.removeItem('his_role');
  window.location.href = '/login';
}
