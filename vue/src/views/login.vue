<template>
    <div class="login-page">
      <div class="login-container">
        <h2>Login</h2>
        <form @submit.prevent="handleLogin" class="login-form">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" v-model="email" id="email" required />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" v-model="password" id="password" required />
          </div>
          <button type="submit" class="submit-button">Login</button>
        </form>
        <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        email: '',
        password: '',
        errorMessage: ''
      };
    },
    methods: {
      generateToken(length = 80) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
        let token = '';
        for (let i = 0; i < length; i++) {
          token += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return token;
      },
      handleLogin() {
        if (this.email === 'HDR@gmail.com' && this.password === 'Hdr@2132') {
          const token = this.generateToken();
          localStorage.setItem('user-token', token);
          localStorage.setItem('firstTimeStatisticsReload', 'true');
          this.$router.push('/');
        } else {
          this.errorMessage = 'Invalid username or password.';
        }
      }
    }
  };
  </script>

  <style scoped>
  /* General Page Styles */
  .login-page {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f2f5;
  }

  /* Login Container Styles */
  .login-container {
    background-color: #fff;
    padding: 2em;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
  }

  /* Form Styles */
  .login-form .form-group {
    margin-bottom: 1em;
  }

  .login-form input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  .submit-button {
    width: 100%;
    background-color: #4CAF50;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 1em;
    transition: all 0.3s ease;
  }

  .submit-button:hover {
    background-color: #45a049;
  }

  .error {
    color: red;
    margin-top: 1em;
  }
  </style>
