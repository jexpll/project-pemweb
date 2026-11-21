-- Jalankan/import file ini setelah memilih database yang sudah diberikan provider hosting.
-- Jangan gunakan CREATE DATABASE karena user hosting tidak memiliki hak membuat database.
-- Di phpMyAdmin Clever Cloud, pilih database btsenyrpk52jpszgkesp terlebih dahulu,
-- lalu jalankan seluruh query di bawah ini.
CREATE TABLE users(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(120) NOT NULL,email VARCHAR(160) UNIQUE NOT NULL,password VARCHAR(255) NOT NULL,role ENUM('user','admin') DEFAULT 'user',phone VARCHAR(30),bio TEXT,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB;
CREATE TABLE jobs(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,title VARCHAR(160) NOT NULL,company VARCHAR(160) NOT NULL,location VARCHAR(120) NOT NULL,type ENUM('Kerja','Magang') NOT NULL,description TEXT NOT NULL,requirements TEXT,deadline DATE,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB;
CREATE TABLE applications(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,user_id INT UNSIGNED NOT NULL,job_id INT UNSIGNED NOT NULL,cover_letter TEXT,cv_url VARCHAR(255),status ENUM('Terkirim','Ditinjau','Diterima','Ditolak') DEFAULT 'Terkirim',created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,UNIQUE KEY one_apply(user_id,job_id),FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,FOREIGN KEY(job_id) REFERENCES jobs(id) ON DELETE CASCADE) ENGINE=InnoDB;
CREATE TABLE bookmarks(user_id INT UNSIGNED NOT NULL,job_id INT UNSIGNED NOT NULL,PRIMARY KEY(user_id,job_id),FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,FOREIGN KEY(job_id) REFERENCES jobs(id) ON DELETE CASCADE) ENGINE=InnoDB;
INSERT INTO jobs(title,company,location,type,description,requirements,deadline) VALUES
('Junior Brand Strategist','Ruang Imaji','Jakarta Selatan','Kerja','Membantu merancang strategi brand untuk klien dan kampanye digital.','Komunikasi, riset, presentasi','2027-01-30'),
('Content Creator Intern','Narasi Kolektif','Bandung','Magang','Membuat konten kreatif untuk media sosial dan editorial.','Menulis, video pendek, kreatif','2027-02-15'),
('Frontend Engineer','Langit Digital','Remote','Kerja','Membangun pengalaman web cepat dan accessible bersama tim produk.','HTML, CSS, JavaScript','2027-02-28'),
('Backend Developer','Nusa Teknologi','Jakarta / Remote','Kerja','Mengembangkan API dan layanan backend yang aman dan scalable.','PHP atau Node.js, SQL, REST API','2027-03-10'),
('UI/UX Designer Intern','Rancang Rupa','Yogyakarta','Magang','Mendukung riset pengguna, wireframe, dan desain produk digital.','Figma, user research, prototyping','2027-02-20'),
('Digital Marketing Specialist','Tumbuh Bersama','Jakarta','Kerja','Menjalankan strategi acquisition dan campaign digital berbasis data.','SEO, SEM, analytics, copywriting','2027-03-05'),
('Data Analyst','DataKita','Bandung / Remote','Kerja','Mengolah data bisnis menjadi insight untuk keputusan produk.','SQL, spreadsheet, dashboard, statistik','2027-03-18'),
('HR People Operations Intern','Ruang Tumbuh','Jakarta','Magang','Membantu proses onboarding, employee experience, dan administrasi HR.','Komunikasi, administrasi, organisasi','2027-02-25'),
('Social Media Intern','Kreasi Harian','Surabaya','Magang','Menyusun kalender konten dan mengelola interaksi komunitas.','Content planning, Canva, social media','2027-02-28'),
('Product Manager','Cipta Digital','Jakarta / Remote','Kerja','Menentukan prioritas roadmap dan menyatukan kebutuhan user dengan bisnis.','Product discovery, analisis, komunikasi','2027-03-30'),
('Finance & Accounting Staff','Arunika Group','Tangerang','Kerja','Mengelola pencatatan transaksi dan laporan keuangan bulanan.','Akuntansi, Excel, teliti','2027-03-12'),
('QA Tester Intern','Koding Aman','Malang / Remote','Magang','Menguji fitur aplikasi dan mendokumentasikan bug secara sistematis.','Test case, detail-oriented, dasar API','2027-03-08'),
('Graphic Designer','Studio Lentera','Denpasar','Kerja','Membuat aset visual untuk campaign, brand, dan kebutuhan digital.','Adobe atau Figma, layout, branding','2027-03-22'),
('Customer Success Associate','Belajar Terus','Jakarta','Kerja','Membantu pelanggan mendapatkan hasil terbaik dari produk kami.','Empati, komunikasi, problem solving','2027-03-15'),
('Research Assistant Intern','Insight Lab','Remote','Magang','Mendukung riset pasar, wawancara, dan penyusunan laporan insight.','Riset, menulis, analisis kualitatif','2027-03-20');
-- Setelah register, ubah role akun admin secara manual: UPDATE users SET role='admin' WHERE email='admin@karsa.id';