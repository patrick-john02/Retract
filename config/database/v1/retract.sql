CREATE DATABASE research_tracking_system;
USE research_tracking_system;

-- Roles Table
CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE NOT NULL,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Users Table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    birthday DATE NULL,
    account_status ENUM('active', 'inactive', 'banned') DEFAULT 'active',
    role_id INT NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- Students Table
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    student_id VARCHAR(50) UNIQUE NOT NULL, 
    block VARCHAR(10) NOT NULL, 
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Faculty Members Table
CREATE TABLE faculty_members (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    employee_id VARCHAR(50) UNIQUE NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Categories Table
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

-- Research Papers Table
CREATE TABLE research_papers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    abstract TEXT NOT NULL,
    file_path VARCHAR(255) NOT NULL, 
    file_type VARCHAR(10) NOT NULL,
    category_id INT NULL,
    submitted_by INT NULL,  
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'approved', 'rejected' , 'published') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (submitted_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Actions Table
CREATE TABLE actions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    action_name VARCHAR(100) UNIQUE NOT NULL
);

-- Logs Table
CREATE TABLE tracking_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    research_id INT NULL,
    affected_user_id INT NULL,
    action_id INT NOT NULL,
    action_by INT NULL,
    ip_address VARBINARY(16) NULL,
    log_details TEXT NULL,
    user_agent TEXT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_deleted BOOLEAN DEFAULT FALSE,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (research_id) REFERENCES research_papers(id) ON DELETE SET NULL,
    FOREIGN KEY (affected_user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (action_id) REFERENCES actions(id) ON DELETE CASCADE,
    FOREIGN KEY (action_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Indexes Optimization
CREATE INDEX idx_students_user_id ON students(user_id);
CREATE INDEX idx_faculty_user_id ON faculty_members(user_id);
CREATE INDEX idx_research_papers_category ON research_papers(category_id);
CREATE INDEX idx_research_papers_user ON research_papers(submitted_by);
CREATE INDEX idx_research_papers_status ON research_papers(status);
CREATE INDEX idx_users_role ON users(role_id);
CREATE INDEX idx_tracking_logs_research ON tracking_logs(research_id);
CREATE INDEX idx_tracking_logs_user ON tracking_logs(affected_user_id);
CREATE INDEX idx_actions_name ON actions(action_name);
