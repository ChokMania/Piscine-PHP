SELECT COUNT(`date`) AS 'film' FROM `member_history`
WHERE YEAR(`date`) >= 2006 AND MONTH(`date`) >= 10 AND DAY(`date`) >= 30
AND YEAR(`date`) <= 2007 AND MONTH(`date`) <= 07 AND DAY(`date`) <= 27
OR MONTH(`date`) = 12 AND DAY(`date`) = 24;