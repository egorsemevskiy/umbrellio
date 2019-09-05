Рещение задачи по SQL
    
    CREATE table users_job (id bigserial, group_id bigint)

    INSERT INTO users_job(group_id) values (1), (1), (1), (2), (1), (3)

    SELECT sum(g) FROM (SELECT CASE WHEN group_id =lag(group_id) OVER (order by id) THEN 0 ELSE 1 END AS g FROM users_job )as res

    SELECT COUNT(*), group_id FROM ( SELECT ROW_NUMBER() OVER (ORDER BY id) - ROW_NUMBER() OVER (PARTITION BY group_id ORDER BY id) AS res, id, group_id FROM users_job )RegroupedTable GROUP BY group_id,res

    SELECT g FROM (SELECT CASE WHEN group_id =lag(group_id) OVER (ORDER BY id) THEN null ELSE group_id ENS AS g FROM users_job )AS res WHERE g IS NOT null