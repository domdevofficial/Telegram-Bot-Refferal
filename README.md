# 🤖 DomReferralBot  

DomReferralBot is a **Telegram referral bot** that allows users to generate unique referral links, track invites, and send notifications to a Telegram group.  

---

## 🌟 Features  

✔️ **Referral Tracking** – Logs who referred whom.  
✔️ **Unique Referral Links** – Each user gets a unique link.  
✔️ **Group Notifications** – Announces new users in a Telegram group.  
✔️ **Admin Panel (Obfuscated)** – Hidden for security.  
✔️ **Secure Data Handling** – Prevents unauthorized access.  

---

## 📌 Installation Guide  

### 1️⃣ Upload Files  
- Extract and upload the bot files to your server.  

### 2️⃣ Set Up the Bot  
- Edit the `bot.php` file and add your **Bot Token** and **Group Chat ID**:  
  ```php
  $token = "YOUR_BOT_TOKEN";
  $group_chat_id = "YOUR_GROUP_CHAT_ID";
  ```

### 3️⃣ Run the Bot  
Set up a Webhook for the bot:  

```
https://api.telegram.org/botYOUR_BOT_TOKEN/setWebhook?url=YOUR_SERVER_URL/bot.php
```

---

## 🔑 Admin Panel  

The admin panel is obfuscated for security reasons.  
You can access it after setting up the bot correctly.  

**Default Admin Login:**  
- Username: `admin`  
- Password: `1234`  

---

## 🗂️ Project Structure  

```
/DomReferralBot
│── bot.php             # Main bot script
│── admin.php           # Obfuscated admin panel
│── user.txt            # Stores referral logs
│── README.md           # Documentation
```

---

## 🎯 How It Works  

1️⃣ A user starts the bot and gets a unique referral link.  
2️⃣ When a new user joins using the referral link, the bot logs the referral.  
3️⃣ The bot sends a welcome message and notifies the Telegram group.  

---

## ⚠️ Security Notes  

🔒 Keep the bot token private to prevent abuse.  
🛑 Do not share the admin panel URL.  

---

## 🏆 Credits  

Developed with 💙 by **DomDev**  

📌 *Enjoy using DomReferralBot! Let us know if you need more features!*  
