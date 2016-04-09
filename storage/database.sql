CREATE TABLE area_funding
(
  id INT(11) PRIMARY KEY NOT NULL,
  area_id INT(11) NOT NULL,
  funding_id INT(11) NOT NULL,
  area_fundingcol VARCHAR(45),
  CONSTRAINT fk_area_funding_area_id FOREIGN KEY (area_id) REFERENCES areas (id),
  CONSTRAINT fk_area_funding_funding_id FOREIGN KEY (funding_id) REFERENCES fundings (id)
);
CREATE INDEX fk_area_funding_aread_id_idx ON area_funding (area_id);
CREATE INDEX fk_area_funding_funding_id_idx ON area_funding (funding_id);
CREATE TABLE areas
(
  id INT(11) PRIMARY KEY NOT NULL,
  name VARCHAR(45) NOT NULL,
  description TEXT
);
CREATE TABLE categories
(
  id INT(11) PRIMARY KEY NOT NULL,
  name VARCHAR(45) NOT NULL,
  description TEXT
);
CREATE TABLE category_funding
(
  id INT(11) PRIMARY KEY NOT NULL,
  category_id INT(11) NOT NULL,
  funding_id INT(11) NOT NULL,
  CONSTRAINT fk_category_funding_category_id FOREIGN KEY (category_id) REFERENCES categories (id),
  CONSTRAINT fk_category_funding_funding_id FOREIGN KEY (funding_id) REFERENCES fundings (id)
);
CREATE INDEX fk_category_funding_category_id_idx ON category_funding (category_id);
CREATE INDEX fk_category_funding_funding_id_idx ON category_funding (funding_id);
CREATE TABLE districts
(
  id INT(11) PRIMARY KEY NOT NULL,
  name VARCHAR(45) NOT NULL,
  description TEXT
);
CREATE TABLE funding_district
(
  id INT(11) PRIMARY KEY NOT NULL,
  funding_id INT(11) NOT NULL,
  district_id INT(11) NOT NULL,
  funding_districtcol VARCHAR(45),
  CONSTRAINT fk_funding_district_district_id FOREIGN KEY (district_id) REFERENCES districts (id),
  CONSTRAINT fk_funding_district_funding_id FOREIGN KEY (funding_id) REFERENCES fundings (id)
);
CREATE INDEX fk_funding_district_district_id_idx ON funding_district (district_id);
CREATE INDEX fk_funding_district_funding_id_idx ON funding_district (funding_id);
CREATE TABLE funding_link
(
  id INT(11) PRIMARY KEY NOT NULL,
  link_id INT(11) NOT NULL,
  funding_id INT(11) NOT NULL,
  CONSTRAINT fk_funding_id FOREIGN KEY (funding_id) REFERENCES fundings (id),
  CONSTRAINT fk_link_id FOREIGN KEY (link_id) REFERENCES links (id)
);
CREATE INDEX fk_funding_id_idx ON funding_link (funding_id);
CREATE INDEX fk_link_id_idx ON funding_link (link_id);
CREATE TABLE funding_profile
(
  id INT(11) PRIMARY KEY NOT NULL,
  funding_id INT(11) NOT NULL,
  profile_id INT(11) NOT NULL,
  CONSTRAINT fk_funding_profile_funding_id FOREIGN KEY (funding_id) REFERENCES fundings (id),
  CONSTRAINT fk_funding_profile_profile_id FOREIGN KEY (profile_id) REFERENCES profiles (id)
);
CREATE INDEX fk_funding_profile_funding_id_idx ON funding_profile (funding_id);
CREATE INDEX fk_funding_profile_profile_id_idx ON funding_profile (profile_id);
CREATE TABLE fundings
(
  id INT(11) PRIMARY KEY NOT NULL,
  title VARCHAR(45) NOT NULL,
  description TEXT
);
CREATE TABLE links
(
  id INT(11) PRIMARY KEY NOT NULL,
  url TEXT NOT NULL,
  description TEXT NOT NULL
);
CREATE TABLE profiles
(
  id INT(11) PRIMARY KEY NOT NULL,
  name VARCHAR(45) NOT NULL,
  description TEXT
);
CREATE UNIQUE INDEX name_UNIQUE ON profiles (name);