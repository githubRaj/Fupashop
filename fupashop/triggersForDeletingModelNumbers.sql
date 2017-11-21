DROP TRIGGER IF EXISTS after_desktops_delete;
DROP TRIGGER IF EXISTS after_laptops_delete;
DROP TRIGGER IF EXISTS after_tablets_delete;
DROP TRIGGER IF EXISTS after_monitors_delete;


delimiter //
CREATE TRIGGER after_desktops_delete
AFTER DELETE ON desktops
FOR EACH ROW
BEGIN
DELETE FROM serialnumbers where modelNumber = OLD.modelNumber;
END;//
delimiter;

delimiter //
CREATE TRIGGER after_laptops_delete
AFTER DELETE ON laptops
FOR EACH ROW
BEGIN
DELETE FROM serialnumbers where modelNumber = OLD.modelNumber;
END;//
delimiter;

delimiter //
CREATE TRIGGER after_tablets_delete
AFTER DELETE ON tablets
FOR EACH ROW
BEGIN
DELETE FROM serialnumbers where modelNumber = OLD.modelNumber;
END;//
delimiter;

delimiter //
CREATE TRIGGER after_monitors_delete
AFTER DELETE ON monitors
FOR EACH ROW
BEGIN
DELETE FROM serialnumbers where modelNumber = OLD.modelNumber;
END;//
delimiter;