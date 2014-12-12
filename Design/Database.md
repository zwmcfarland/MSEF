<h1>Database Design</h1>
- Name: MSEF
- Product: MySQL

<h2>Tables</h2>
| Table Name        |
|-------------------|
| AwardKeywords     |
| Awards            |
| Categories        |
| CategoryKeywords  |
| Events            |
| FormKeywords      |
| Forms             |
| Keywords          |
| ProjectCatagories |
| Projects          |
| Schools           |
| SecurityTypes     |
| SponsorProjects   |
| SponsorStudents   |
| Status            |
| StudentForms      |
| Users             |

<h2>Table Structure</h2>
<h4>AwardKeywords</h4>
| Field     | Type    | Null | Key | Default | Extra |
|-----------|---------|------|-----|---------|-------|
| AwardId   | int(11) | NO   | MUL | NULL    |       |
| KeywordId | int(11) | NO   | MUL | NULL    |       |

<h4>Awards</h4>
| Field       | Type          | Null | Key | Default | Extra          |
|-------------|---------------|------|-----|---------|----------------|
| Id          | int(11)       | NO   | PRI | NULL    | auto_increment |
| Name        | varchar(250)  | NO   |     | NULL    |                |
| Description | varchar(1000) | NO   |     | NULL    |                |
| Reward      | varchar(1000) | YES  |     | NULL    |                |

<h4>Categories</h4>
| Field       | Type         | Null | Key | Default | Extra          |
|-------------|--------------|------|-----|---------|----------------|
| Id          | int(11)      | NO   | PRI | NULL    | auto_increment |
| Name        | varchar(250) | NO   |     | NULL    |                |
| Description | varchar(250) | NO   |     | NULL    |                |
| MaxCapacity | int(11)      | YES  |     | NULL    |                |

<h4>CategoryKeywords</h4>
| Field      | Type    | Null | Key | Default | Extra |
|------------|---------|------|-----|---------|-------|
| CategoryId | int(11) | NO   | MUL | NULL    |       |
| KeywordId  | int(11) | NO   | MUL | NULL    |       |

<h4>Events</h4>
| Field       | Type          | Null | Key | Default | Extra          |
|-------------|---------------|------|-----|---------|----------------|
| Id          | int(11)       | NO   | PRI | NULL    | auto_increment |
| Name        | varchar(255)  | NO   |     | NULL    |                |
| StartDate   | datetime      | NO   |     | NULL    |                |
| EndDate     | datetime      | NO   |     | NULL    |                |
| Description | varchar(1000) | NO   |     | NULL    |                |
| Location    | varchar(1000) | YES  |     | NULL    |                |

<h4>FormKeywords</h4>
| Field     | Type    | Null | Key | Default | Extra |
|-----------|---------|------|-----|---------|-------|
| FormId    | int(11) | NO   | MUL | NULL    |       |
| KeywordId | int(11) | NO   | MUL | NULL    |       |

<h4>Forms</h4>
| Field    | Type          | Null | Key | Default | Extra          |
|----------|---------------|------|-----|---------|----------------|
| Id       | int(11)       | NO   | PRI | NULL    | auto_increment |
| Name     | varchar(250)  | NO   |     | NULL    |                |
| FormPath | varchar(1000) | NO   |     | NULL    |                |

<h4>Keywords</h4>
| Field   | Type         | Null | Key | Default | Extra          |
|---------|--------------|------|-----|---------|----------------|
| Id      | int(11)      | NO   | PRI | NULL    | auto_increment |
| Keyword | varchar(250) | NO   |     | NULL    |                |

<h4>ProjectCatagories</h4>
| Field      | Type    | Null | Key | Default | Extra |
|------------|---------|------|-----|---------|-------|
| ProjectId  | int(11) | NO   | MUL | NULL    |       |
| CategoryId | int(11) | NO   | MUL | NULL    |       |

<h4>Projects</h4>
| Field       | Type          | Null | Key | Default | Extra          |
|-------------|---------------|------|-----|---------|----------------|
| Id          | int(11)       | NO   | PRI | NULL    | auto_increment |
| StatusId    | int(11)       | NO   | MUL | NULL    |                |
| Name        | varchar(250)  | NO   |     | NULL    |                |
| Description | varchar(1000) | NO   |     | NULL    |                |
| Abstract    | varchar(1000) | NO   |     | NULL    |                |
| Electrical  | tinyint(1)    | NO   |     | 0       |                |

<h4>Schools</h4>
| Field    | Type         | Null | Key | Default | Extra          |
|----------|--------------|------|-----|---------|----------------|
| Id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| Name     | varchar(255) | NO   |     | NULL    |                |
| City     | varchar(255) | NO   |     | NULL    |                |
| State    | varchar(255) | NO   |     | NULL    |                |
| Address1 | varchar(255) | NO   |     | NULL    |                |
| Address2 | varchar(255) | NO   |     | NULL    |                |
| Zip      | varchar(10)  | NO   |     | NULL    |                |

<h4>SecurityTypes</h4>
| Field       | Type          | Null | Key | Default | Extra          |
|-------------|---------------|------|-----|---------|----------------|
| Id          | int(11)       | NO   | PRI | NULL    | auto_increment |
| Name        | varchar(255)  | NO   |     | NULL    |                |
| Description | varchar(1000) | YES  |     | NULL    |                |

<h4>SponsorProjects</h4>
| Field     | Type    | Null | Key | Default | Extra |
|-----------|---------|------|-----|---------|-------|
| projectId | int(11) | NO   | MUL | NULL    |       |
| TeacherId | int(11) | NO   | MUL | NULL    |       |

<h4>Status</h4>
| Field       | Type         | Null | Key | Default | Extra          |
|-------------|--------------|------|-----|---------|----------------|
| Id          | int(11)      | NO   | PRI | NULL    | auto_increment |
| Name        | varchar(100) | NO   |     | NULL    |                |
| Description | varchar(250) | YES  |     | NULL    |                |

<h4>StudentForms</h4>
| Field     | Type    | Null | Key | Default | Extra |
|-----------|---------|------|-----|---------|-------|
| StudentId | int(11) | NO   | MUL | NULL    |       |
| FormId    | int(11) | NO   | MUL | NULL    |       |
| StatusId  | int(11) | NO   | MUL | NULL    |       |

<h4>Users</h4>
| Field             | Type         | Null | Key | Default | Extra          |
|-------------------|--------------|------|-----|---------|----------------|
| Id                | int(11)      | NO   | PRI | NULL    | auto_increment |
| FirstName         | varchar(255) | NO   |     | NULL    |                |
| LastName          | varchar(255) | NO   |     | NULL    |                |
| PhoneNumber       | varchar(11)  | NO   |     | NULL    |                |
| SchoolId          | int(11)      | NO   | MUL | NULL    |                |
| Grade             | varchar(200) | YES  |     | NULL    |                |
| ParentFirstName   | varchar(255) | YES  |     | NULL    |                |
| ParentLastName    | varchar(255) | YES  |     | NULL    |                |
| ParentPhoneNumber | varchar(255) | YES  |     | NULL    |                |
| ParentEmail       | varchar(500) | YES  |     | NULL    |                |
| SecurityTypeId    | int(11)      | NO   | MUL | NULL    |                |
| Email             | varchar(500) | NO   |     | NULL    |                |
| Password          | varchar(100) | NO   |     | NULL    |                |
| AltPhoneNumber    | varchar(11)  | YES  |     | NULL    |                |
| Position          | varchar(255) | YES  |     | NULL    |                |
| City              | varchar(255) | YES  |     | NULL    |                |
| State             | varchar(255) | YES  |     | NULL    |                |
| Address1          | varchar(255) | YES  |     | NULL    |                |
| Address2          | varchar(255) | YES  |     | NULL    |                |
| Zip               | varchar(11)  | YES  |     | NULL    |                |

