CREATE DATABASE IF NOT EXISTS exads;
USE exads;

-- create tables
CREATE TABLE tv_series (
    id INT NOT NULL AUTO_INCREMENT ,
    title VARCHAR(100) NOT NULL ,
    channel INT NOT NULL ,
    gender VARCHAR(10) NOT NULL ,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE tv_series_intervals (
    id_tv_series INT NOT NULL ,
    week_day TINYINT NOT NULL ,
    show_time TIME NOT NULL ,
    PRIMARY KEY (id_tv_series, week_day, show_time)
) ENGINE = InnoDB;

ALTER TABLE tv_series_intervals
ADD FOREIGN KEY (id_tv_series) REFERENCES tv_series(id);

INSERT INTO tv_series VALUES (1, 'Vikings',        '302', 'Comedy');
INSERT INTO tv_series VALUES (2, 'Peaky Blinders', '415', 'Action');
INSERT INTO tv_series VALUES (3, 'The Last Of Us', '217', 'Sci-fi');

INSERT INTO tv_series_intervals VALUES (1, 1, '19:00:00');
INSERT INTO tv_series_intervals VALUES (1, 3, '19:00:00');
INSERT INTO tv_series_intervals VALUES (1, 5, '20:00:00');

INSERT INTO tv_series_intervals VALUES (2, 1, '19:00:00');
INSERT INTO tv_series_intervals VALUES (2, 1, '22:00:00');
INSERT INTO tv_series_intervals VALUES (2, 2, '12:00:00');
INSERT INTO tv_series_intervals VALUES (2, 3, '14:00:00');
INSERT INTO tv_series_intervals VALUES (2, 4, '16:00:00');
INSERT INTO tv_series_intervals VALUES (2, 5, '19:00:00');
INSERT INTO tv_series_intervals VALUES (2, 6, '19:00:00');

INSERT INTO tv_series_intervals VALUES (3, 1, '12:00:00');
INSERT INTO tv_series_intervals VALUES (3, 2, '12:30:00');
INSERT INTO tv_series_intervals VALUES (3, 3, '14:00:00');
INSERT INTO tv_series_intervals VALUES (3, 4, '14:30:00');
INSERT INTO tv_series_intervals VALUES (3, 5, '16:00:00');
INSERT INTO tv_series_intervals VALUES (3, 6, '10:00:00');
INSERT INTO tv_series_intervals VALUES (3, 7, '10:00:00');
INSERT INTO tv_series_intervals VALUES (3, 7, '12:00:00');
INSERT INTO tv_series_intervals VALUES (3, 7, '14:00:00');
INSERT INTO tv_series_intervals VALUES (3, 7, '16:00:00');
INSERT INTO tv_series_intervals VALUES (3, 7, '18:00:00');
INSERT INTO tv_series_intervals VALUES (3, 7, '20:00:00');

INSERT INTO tv_series_intervals VALUES (1, 2, '23:00:00');
INSERT INTO tv_series_intervals VALUES (2, 2, '23:00:00');
INSERT INTO tv_series_intervals VALUES (3, 2, '23:00:00');
