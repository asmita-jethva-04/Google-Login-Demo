
# Google Login with PHP

This project demonstrates how to integrate Google Login authentication into a PHP application. Users can securely log in via their Google account, making authentication fast and user-friendly.

## 🛠️ Features

- Google OAuth 2.0 login integration
- Secure authentication flow
- User account creation/update after Google login
- Session-based login/logout functionality

## 📁 Project Structure

```

/google-login
├── vendor/
├── composer.json
├── composer.lock
├── db.php
├── google-signin.png
└── index.php

````

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.0
- Google Cloud Console Account

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/yourusername/google-login.git
   cd google-login
````

2. **Install dependencies**

   ```bash
   Xampp install
   localhost/google-login-demo/index.php
   ```



## 🔐 Google Cloud Setup

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a project or use an existing one.
3. Enable **OAuth 2.0** and configure the **OAuth Consent Screen**.
4. Under **Credentials**, create an **OAuth 2.0 Client ID**.
5. Set the redirect URI to:

   ```
   http://localhost:8000/auth/google/callback
   ```

## 📦 Dependencies

* [Google Developer Console](https://console.developers.google.com/)

## 🧪 Testing

You can manually test login/logout flows via the browser. For automated testing.

## 🤝 Contributing

Contributions are welcome! Feel free to fork the repository and open a pull request.

## 📄 License

This project is open-sourced under the [MIT license](LICENSE).


