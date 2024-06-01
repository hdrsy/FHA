// This is a dummy authentication service. Replace it with your real logic.
export function isLoggedIn() {
    // Example: Check if a user token exists
    return !!localStorage.getItem('user-token');
  }
