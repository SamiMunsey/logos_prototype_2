--SET a bunch of initial parameters  ??

--RESOURCE

CREATE TABLE resource (
    id INTEGER PRIMARY KEY CHECK (id = 5),
    isbn VARCHAR(50),
    title VARCHAR(100) NOT NULL,
    classification VARCHAR(50) NOT NULL
);



CREATE TABLE resource_info (
    resource_id INTEGER REFERENCES resource(id) PRIMARY KEY,
    series VARCHAR(100),
    author VARCHAR(100),
    illustrator VARCHAR(100),
    summary VARCHAR(1024),
    publisher VARCHAR(100),
    publication_date DATE DEFAULT '1901-01-01',
    reading_age DECIMAL(19,2) CHECK (reading_age >= 0.0)
);

CREATE TABLE library_info (
    resource_id INTEGER REFERENCES resource(id)  PRIMARY KEY,
    genre VARCHAR(100),
    form VARCHAR(100),
    owner VARCHAR(100),
    location VARCHAR(100),
    date_added DATE DEFAULT '1901-01-01',
    cost DECIMAL(19,2) CHECK (cost >= 0.0),
    provenance VARCHAR(255)
);


-- GROUPS
/*
CREATE TABLE borrower_group (
    id INTEGER PRIMARY KEY,
    group_name VARCHAR(255) NOT NULL UNIQUE,
    site VARCHAR(255)
);
*/
-- BORROWER

CREATE TABLE borrower (
    id INTEGER PRIMARY KEY,
    forename VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    preferred_name VARCHAR(100),
    dob DATE NOT NULL
);

/*

CREATE TABLE borrower_info (
    id INTEGER PRIMARY KEY,
    borrower_id INTEGER REFERENCES borrower(id) UNIQUE,
    group_id INTEGER REFERENCES borrower_group(id),
    banned BOOLEAN DEFAULT FALSE,
    notes VARCHAR(1024)
);

*/
/*

CREATE TABLE contact (
    id INTEGER PRIMARY KEY,
    borrower_id INTEGER REFERENCES borrower(id) UNIQUE,
    tel VARCHAR(20),
    tel2 VARCHAR(20),
    email VARCHAR(100),
    house_no VARCHAR(20),
    address_1 VARCHAR(100),
    address_2 VARCHAR(100),
    address_3 VARCHAR(100),
    postcode VARCHAR(10)
);

CREATE TABLE guardian (
    id INTEGER PRIMARY KEY,
    borrower_id INTEGER REFERENCES borrower(id) NOT NULL,
    forename VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    tile VARCHAR(20),
    tel VARCHAR(20),
    tel2 VARCHAR(20),
    email VARCHAR(100),
    house_no VARCHAR(20),
    address_1 VARCHAR(100),
    address_2 VARCHAR(100),
    address_3 VARCHAR(100),
    postcode VARCHAR(10)    
);

*/

-- LOANS

CREATE TABLE loan (
    resource_id INTEGER REFERENCES resource(id) UNIQUE,
    borrower_id INTEGER REFERENCES borrower(id),
    /*date_issued DATE NOT NULL,
    date_due DATE NOT NULL,*/
    PRIMARY KEY(resource_id, borrower_id)
);

/*
CREATE TABLE reservation (
    resource_id INTEGER REFERENCES resource(id) UNIQUE,
    borrower_id INTEGER REFERENCES borrower(id),
    date_reserved DATE NOT NULL,
    reserve_lapse DATE NOT NULL,
    PRIMARY KEY(resource_id, borrower_id)
);


-- RESTRICTIONS

CREATE TABLE restriction (
    id INTEGER PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255)
);

CREATE TABLE restrictions_resources (
    restriction_id INTEGER REFERENCES restriction(id),
    resource_id INTEGER REFERENCES resource(id),
    PRIMARY KEY (restriction_id, resource_id)
);

CREATE TABLE restrictions_borrowers (
    restriction_id INTEGER REFERENCES restriction(id),
    borrower_id INTEGER REFERENCES borrower(id),
    PRIMARY KEY(restriction_id, borrower_id)
);
*/

-- Cataloguing Policy
/*
CREATE TABLE cataloguing_policy (
    creator VARCHAR(100) NOT NULL UNIQUE,
    date_created DATE NOT NULL UNIQUE,
    modifyer VARCHAR(100),
    date_modified DATE,
    policy TEXT,
    PRIMARY KEY(creator, date_created)
); */

-- SUBJECT HEADINGS

CREATE TABLE subject_heading (
    heading VARCHAR(255) PRIMARY KEY
);

CREATE TABLE resource_sh (
    resource_id INTEGER REFERENCES resource(id) UNIQUE,
    sh VARCHAR(255) REFERENCES subject_heading(heading),
    date_issued DATE NOT NULL,
    date_due DATE NOT NULL,
    PRIMARY KEY(resource_id, borrower_id)
);

-- CONTROLLED INPUT

CREATE TABLE genre (
    name VARCHAR(20) PRIMARY KEY
);