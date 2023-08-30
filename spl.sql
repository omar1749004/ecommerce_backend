CREATE VIEW  itemsview    AS
SELECT items.* ,categories.* FROM items
INNER JOIN categories on items.item_c=categories_id

SELECT itemsview.*, 1 as favorite FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemid=itemsview.item_id AND favorite.favorite_usersid =13
UNION ALL SELECT *, 0 as favorite FROM itemsview
WHERE item_id != (SELECT itemsview.item_id FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemid=itemsview.item_id AND favorite.favorite_usersid =13)


CREATE  VIEW  myfavorite AS
SELECT favorite.* ,items.*, users.users_id FROM favorite
INNER JOIN items ON  items.item_id =favorite_itemid
INNER JOIN users ON  users.users_id =favorite_usersid

CREATE OR REPLACE VIEW cartview as
SELECT SUM((item_price -(item_price * item_descound / 100))) as itemprice, COUNT(cart_itemsid) as itemcount ,cart.* ,items.* FROM cart 
INNER JOIN items on items.item_id =cart_itemsid
where cart_orders =0
GROUP BY cart_userid ,cart_itemsid ,cart_orders


CREATE OR REPLACE VIEW ordersview as
SELECT orders.* ,address.* FROM orders 
LEFT JOIN address ON address.address_id =orders_address


CREATE OR REPLACE VIEW ordersdetialsview as
SELECT SUM((item_price -(item_price * item_descound / 100))) as itemprice, COUNT(cart_itemsid) as itemcount ,cart.* ,items.*,ordersview.* FROM cart 
INNER JOIN items on items.item_id =cart_itemsid
INNER JOIN ordersview on ordersview.orders_id =cart.cart_orders
where cart_orders !=0
GROUP BY cart_userid ,cart_itemsid,cart_orders

CREATE or REPLACE VIEW itemTopSellingview as
SELECT COUNT(cart_id) AS countItem ,cart.* ,items.* from cart
INNER JOIN items ON cart_itemsid = items.item_id
WHERE cart_orders != 0 
GROUP BY cart_itemsid