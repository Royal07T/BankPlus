# BankPlus
Building a Simplified Version of Bank Plus. Laravel Intern Assessment test.
This project provides a basic framework for a simple banking application with features like:

* **User Registration and Authentication:** (Assumed to be implemented separately)
* **Balance Inquiry:** Calculate and display the user's current account balance.
* **Deposits:** Allow users to make deposits into their accounts.
* **Withdrawals:** Allow users to withdraw funds from their accounts (with checks for sufficient funds).
* **Transaction History:** Display a list of all the user's transactions, sorted by date.
* **Event-driven Logging:** Log all transactions using a dedicated event and listener.

**Key Technologies:**

* **Laravel:** PHP framework
* **Eloquent ORM:** For database interactions
* **Database:** Sqlite or other supported database

**Project Structure:**

* **app/Models:** Contains the `User` and `Transaction` models.
* **app/Http/Controllers:** Contains the `FinanceController` for handling financial operations.
* **app/Events:** Contains the `TransactionMade` event.
* **app/Listeners:** Contains the `LogTransaction` listener.
* **routes/web.php:** Defines the application routes.
* **database/migrations:** Contains the database migrations for creating tables.

**Installation:**

1. **Clone the repository:**
   ```bash
   git clone </Royal07T/BankPlus>

2. **Install dependencies:**
    ``composer install
