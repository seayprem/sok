# NEW UPDATE MAIN PRODUCT

# New Solution

if size = XL then
INSERT INTO `inventory` (inv_id, inv_name, inv_qty, inv_min, inv_max, inv_size, inv_color, cate_id, inv_sub_id) 
VALUES ('P02', 'เทส', 1, 0, 10, 'XL', 'ดำ', '1', null), (CONCAT('P02','L'), 'เทส', 1, 0, 10, 'L', 'ดำ', '1', 'P01')

if size XL = เบิกจ่าย then
UPDATE inventory ........ WHERE inv_sub_id = inv_id