ALTER TABLE restaurant
ADD COLUMN FromDay date null,
ADD COLUMN ToDay date null;

ALTER TABLE nightlife
ADD COLUMN FromDay date null,
ADD COLUMN ToDay date null;