# 📄 Convocation PDF Generator – ENA Agadir

This PHP web application enables preselected students to securely download their personalized **convocation** for the entrance exam to the École Nationale d’Architecture d’Agadir.

---

## 🧩 Features

- 🎓 Student input form (CNE & CIN)
- 🔍 Validates credentials against MySQL database
- 📋 Displays full student details
- 📥 Automatically generates and downloads a customized PDF
- 🕒 Logs download timestamps for auditing

---

## 💻 Technologies Used

- PHP (backend)
- HTML & CSS (frontend form)
- FPDF (PDF generation)
- MySQL (data storage)
- Apache (recommended server)

---

## 🚀 Live Demo

🔗 [Click here to access the live project](https://enaagadir.ac.ma/convocation.php)  
Use D144029495 as CNE and J597750 as CIN to test the program


---

## 🗂️ Project Structure

```

convocation-pdf-generator/
├── convocation.php             # Frontend + logic for DB query
├── ConvocationPDF.php          # PDF generator script
├── fpdf/                       # FPDF library
│   └── fpdf.php
├── assets/
│   └── e.jpg                   # Image used in convocation.php
├── sql/
│   └── feuil1\_structure.sql    # SQL schema of student data (optional)
└── README.md

````

---

## ⚙️ How to Run Locally

1. Clone the repository:
   ```bash
   git clone https://github.com/Taha-hubb/convocation-pdf-generator.git
````

2. Place the folder into your `htdocs/` if using XAMPP or `www/` for WAMP.

3. Import the `feuil1_structure.sql` (or your own table) into your MySQL database.

4. Update database credentials in:

   * `convocation.php`
   * `ConvocationPDF.php`

5. Open the project in your browser:

   ```
   http://localhost/convocation-pdf-generator/convocation.php
   ```

---

## 📬 Contact

* 📧 [taha@enaagadir.ac.ma](mailto:professionalanouar@gmail.com)
* 🌐 [Portfolio](https://taha-hubb.github.io)

---

## 📄 License

This project is intended for educational and internal institutional use. For other uses, please contact the author.

```

---

