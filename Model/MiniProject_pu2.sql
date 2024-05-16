SELECT * from LIST_FEATUREAS_POSITION join POSITION on ID_POSITION = ID_PST JOIN BASE_FEATUREAS ON ID_FEATUREAS = ID_FEAT;

INSERT INTO REQUIRED_EMP  VALUES ('Q002', '2023-10-03' ,'AASDFASDFASDF','FULLTIME', 3,0,P000,E000,1,NULL);

INSERT INTO REQUIRED_EMP (ID_REQ, DAYSAMVE_REQ, DETEL_REQ, TYPE_REQ, NUM_REQ, GET_REQ, PST_REQ, EMP_EMP, STATUS, WAYNOT) 
VALUES ('Q002', TO_DATE('2023-10-04', 'YYYY-MM-DD'), 'ASDFASDF', 'FULL', '3', '0', 'P000', 'E000', '??????????', NULL);

INSERT INTO REQUIRED_EMP (ID_REQ, DAYSAMVE_REQ, DETEL_REQ, TYPE_REQ, NUM_REQ, GET_REQ, PST_REQ, EMP_EMP, STATUS, WAYNOT) 
VALUES ('Q002', TO_DATE('2023-10-03', 'YYYY-MM-DD'), 'asdfasdf', 'full', '3', '0', 'P002', 'Kong', '??????????', NULL);


SELECT * from REQUIRED_EMP ;


SELECT * from REQUIRED_EMP 
join EMPLOYEE on emp_emp = id_emp 
join POSITION on pst_req = id_pst 
join DEPENTMENT on EMPLOYEE.DEPNO = DEPENTMENT.ID_DEP 
WHERE id_dep = 'D000';


UPDATE REQUIRED_EMP SET STATUS = '1' where ID_REQ = 'Q000' ;

SELECT * from REQUIRED_EMP 
join EMPLOYEE on emp_emp = id_emp 
join POSITION on pst_req = id_pst 
join DEPENTMENT on EMPLOYEE.DEPNO = DEPENTMENT.ID_DEP where id_dep = 'D000';

UPDATE REQUIRED_EMP SET STATUS = '??????????' , WEYNOT = '????????????' where ID_REQ = 'Q005';


SELECT * FROM RECTUITMENT 
JOIN REQUIRED_EMP ON REQ_REC = ID_REQ
JOIN POSITION ON PST_REQ = ID_PST;

UPDATE RECTUITMENT SET STATUS_REC = '???' where ID_REC = 'C000';

SELECT * FROM RECTUITMENT
JOIN REQUIRED_EMP ON REQ_REC = ID_REQ
JOIN POSITION ON PST_REQ = ID_PST;

SELECT * from required_emp join POSITION on pst_req = id_pst join DEPENTMENT on P_DEPNO = ID_DEP join EMPLOYEE on EMP_EMP = ID_EMP;

SELECT * from INTERVIEW 
join RECTUITMENT on INTERVIEW.REC = RECTUITMENT.ID_REC 
join REQUIRED_EMP on RECTUITMENT.REQ_REC = REQUIRED_EMP.ID_REQ 
join POSITION on REQUIRED_EMP.PST_REQ = POSITION.ID_PST;

ALTER TABLE MEMBER_INTERVIEW
MODIFY (DAY_INTERVIEW date);

SELECT * from INTERVIEW join LIS_NEMP_REC on LIS_NEMP_REC.REC = INTERVIEW.REC join NEW_EMP on nemp = NEW_EMP.ID_NEMP;

SELECT * from SCORE_NEMP join EMPLOYEE on SCORE_NEMp.EMP_INTV = EMPLOYEE.ID_EMP join NEW_EMP on SCORE_NEMp.NEMP_INTV = NEW_EMP.ID_NEMP;

SELECT * from SCORE_NEMP where NEMP_INTV like 'N000';


select 
ID_REQ,
TO_CHAR(DAYSAMVE_REQ, 'dd MON yyyy', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') as DAYS,
NAME_PST,
STATUS,
NAME_DEP,
EMP_LEAD,
WAYNOT,
EMP_EMP 
from 
required_emp 
join POSITION on pst_req = id_pst 
join DEPENTMENT on P_DEPNO = ID_DEP  
where 
ID_REQ like '%03%' or 
TO_CHAR(DAYSAMVE_REQ, 'dd MON yyyy', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') like '%03%' or
NAME_PST like '30' or
NAME_PST like '30'  or
STATUS like '30' or
NAME_DEP like 'it' or
EMP_LEAD like '30' or
WAYNOT like '30' or
EMP_EMP like '30' order by DAYS;

SELECT ID_PERM FROM PERMISSION join POSITION ON PERMISSION.ID_PERM = POSITION.PERNO WHERE NAME_PERM = 'admin';


SELECT 
NAME,
DAYSAMVE_REQ,TYPE_REQ,
NAME_PST,
NUM_REQ,
STATUS,
NAME_DEP,
ID_REQ,
L_NAME,
DETEL_REQ 
from 
REQUIRED_EMP 
join EMPLOYEE on emp_emp = id_emp 
join POSITION on pst_req = id_pst 
join DEPENTMENT on EMPLOYEE.DEPNO = DEPENTMENT.ID_DEP 
WHERE id_dep ='D002' or 
NAME like '' or
DAYSAMVE_REQ like '' or
TYPE_REQ like '' or
NAME_PST like '' or
NUM_REQ like '' or
STATUS like '' or
NAME_DEP like '' or
ID_REQ like '' or
L_NAME like '' or
DETEL_REQ like '';


SELECT NAME, DAYSAMVE_REQ, TYPE_REQ, NAME_PST, NUM_REQ, STATUS, NAME_DEP, ID_REQ, L_NAME, DETEL_REQ ,ID_DEP
from REQUIRED_EMP 
join EMPLOYEE on emp_emp = id_emp
join POSITION on pst_req = id_pst 
join DEPENTMENT on EMPLOYEE.DEPNO = DEPENTMENT.ID_DEP 
WHERE 
(ID_DEP = 'D002') and
(NAME like '%it%' or 
UPPER(DAYSAMVE_REQ) like UPPER('%it%') or 
UPPER(TYPE_REQ) like UPPER('%it%') or
UPPER(NAME_PST) like UPPER('%it%') or 
UPPER(NUM_REQ) like UPPER('%it%') or 
UPPER(STATUS) like UPPER('%it%') or 
UPPER(NAME_DEP) like UPPER('%it%') or 
UPPER(ID_REQ) like UPPER('%it%') or 
UPPER(L_NAME) like UPPER('%it%') or 
UPPER(DETEL_REQ) like UPPER('%it%')) order by STATUS ;

SELECT * FROM RECTUITMENT 
    JOIN REQUIRED_EMP ON REQ_REC = ID_REQ 
    JOIN POSITION ON PST_REQ = ID_PST
    JOIN DEPENTMENT on P_DEPNO = DEPENTMENT.ID_DEP
    JOIN EMPLOYEE on DEPENTMENT.EMP_LEAD = EMPLOYEE.ID_EMP;



SELECT ID_REC,NAME_PST,DAY_REC,DAYEND_REQ,DETEL_REQ,EMPLOYEE.NAME,
    case
        when  ID_REC in (select rec from INTERVIEW) then '1' else '0'
    end as STATUS_INTV
FROM RECTUITMENT 
    JOIN REQUIRED_EMP ON REQ_REC = ID_REQ 
    JOIN POSITION ON PST_REQ = ID_PST
    JOIN DEPENTMENT on P_DEPNO = DEPENTMENT.ID_DEP
    JOIN EMPLOYEE on DEPENTMENT.EMP_LEAD = EMPLOYEE.ID_EMP 
where ID_REC in (select rec from LIS_NEMP_REC)
ORDER by STATUS_INTV;

/*check have New emp pass*/

select count(*) as status_HAVENEMP from LIS_NEMP_REC
join NEW_EMP on nemp = id_nemp
where rec = 'C000' and STATUS = 1;

SELECT * from LIS_NEMP_REC 
join RECTUITMENT on REC = ID_REC 
join NEW_EMP on NEMP = ID_NEMP;

select ID_INTV from MEMBER_INTERVIEW where EMP_INTV = 'E001';
select rec from INTERVIEW where ID_INVIEW in (select ID_INTV from MEMBER_INTERVIEW where EMP_INTV = 'E001');

select rec from INTERVIEW where ID_INVIEW in (select ID_INTV from MEMBER_INTERVIEW where EMP_INTV = 'E001');

select DAY_CHOOSE from MEMBER_INTERVIEW 
join DAY_CHOOSE on MEMBER_INTERVIEW.ID_INTV = DAY_CHOOSE.INTV
where EMP_INTV = 'E001' and ID_INTV = 'V002';

select DAY_CHOOSE from MEMBER_INTERVIEW join DAY_CHOOSE on MEMBER_INTERVIEW.ID_INTV = DAY_CHOOSE.INTV where EMP_INTV = 'E001' and ID_INTV = (select ID_INVIEW from INTERVIEW where REC = 'C002');

UPDATE MEMBER_INTERVIEW SET DAY_INTERVIEW = TO_DATE('2023-10-19 00:00:00', 'YYYY-MM-DD HH24:MI:SS') WHERE EMP_INTV = '';

/**/

/**/
select case when count(*) = 0 then '1' else '0' end as status from MEMBER_INTERVIEW where DAY_INTERVIEW is null and ID_INTV = 'V002';
/*if*/
select count(*) from(select DAY_INTERVIEW,COUNT(*) from MEMBER_INTERVIEW where ID_INTV = 'V002' GROUP BY DAY_INTERVIEW HAVING COUNT(*) >= 3) ;

/*get date of max preple*/
select DAY_INTERVIEW from (select DAY_INTERVIEW,COUNT(*) from MEMBER_INTERVIEW where ID_INTV = 'V002' GROUP BY DAY_INTERVIEW HAVING COUNT(*) >= (SELECT MAX(NUM1) FROM (select DAY_INTERVIEW,COUNT(*) AS NUM1 from MEMBER_INTERVIEW where ID_INTV = 'V002' group by DAY_INTERVIEW ORDER BY NUM1 DESC)));

(SELECT MAX(NUM1) FROM (select DAY_INTERVIEW,COUNT(*) AS NUM1 from MEMBER_INTERVIEW where ID_INTV = 'V002' group by DAY_INTERVIEW ORDER BY NUM1 DESC));


SELECT DAY FROM (select DAY_INTERVIEW as day,count(*) as count from (SELECT * FROM MEMBER_INTERVIEW WHERE ID_INTV = 'V002') group by DAY_INTERVIEW) WHERE COUNT  >= 3 ;

/* max preple */
select MAX(COUNT) 
from  
(
    select DAY_INTERVIEW as day,count(*) as count 
    from 
        (
            SELECT * 
            FROM MEMBER_INTERVIEW 
            WHERE ID_INTV = 'V002'
        ) 
    group by DAY_INTERVIEW
);
SELECT
    CASE
        WHEN 1 IN (
            SELECT
                CASE
                    WHEN COUNT(*) = 0 THEN
                        '1'
                    ELSE
                        '0'
                END AS STATUS
            FROM
                MEMBER_INTERVIEW
            WHERE
                DAY_INTERVIEW IS NULL
                AND ID_INTV = 'V002'
        ) THEN
            CASE
                WHEN (
 /*CHECK COUNT DATE = max  > 1 ? */
                    SELECT
                        COUNT(*)
                    FROM
                        (
 /*get date of popula(max) opreple*/
                            SELECT
                                DAY_INTERVIEW,
                                COUNT(*)
                            FROM
                                MEMBER_INTERVIEW
                            WHERE
                                ID_INTV = 'V002'
                            GROUP BY
                                DAY_INTERVIEW
                            HAVING
                                COUNT(*) = (
 /*COUNT DATE MAX*/
                                    SELECT
                                        MAX(NUM1)
                                    FROM
                                        (
                                            SELECT
                                                DAY_INTERVIEW,
                                                COUNT(*)      AS NUM1
                                            FROM
                                                MEMBER_INTERVIEW
                                            WHERE
                                                ID_INTV = 'V002'
                                            GROUP BY
                                                DAY_INTERVIEW
                                            ORDER BY
                                                NUM1 DESC
                                        )
                                )
                        )
                ) = 1 THEN
                    '1'
                ELSE
                    '-1'
            END
        ELSE
            '0'
    END AS DAY1
FROM
    MEMBER_INTERVIEW
WHERE
    ID_INTV = 'V002'
GROUP BY
    0;

select DAY_INTERVIEW,COUNT(*) 
from MEMBER_INTERVIEW 
where ID_INTV = 'V002' 
GROUP BY DAY_INTERVIEW 
HAVING COUNT(*) = 
                (
                /*COUNT DATE MAX*/
                SELECT MAX(NUM1) 
                FROM 
                (
                    select DAY_INTERVIEW,COUNT(*) AS NUM1 
                    from MEMBER_INTERVIEW where ID_INTV = 'V002' 
                    group by DAY_INTERVIEW 
                    ORDER BY NUM1 DESC
                )
);

UPDATE INTERVIEW SET DAY_SELECT = TO_DATE('2023-10-26 00:00:00', 'YYYY-MM-DD HH24:MI:SS') where ID_INVIEW = (select ID_INVIEW from INTERVIEW where REC = 'C002');

select DAY_INTERVIEW as DAY,count(*) as count from (SELECT * FROM MEMBER_INTERVIEW WHERE ID_INTV = (select ID_INVIEW from INTERVIEW where REC = 'C000') AND MEMBER_INTERVIEW.DAY_INTERVIEW IS NOT NULL) group by DAY_INTERVIEW;

select 
case
    when DAY_INTERVIEW is not null then '1' else '0' 
end as status_Added
from MEMBER_INTERVIEW where EMP_INTV = 'E001' ;

select DAY_SELECT,case when DAY_SELECT is not null then '1' else '0' end as A from INTERVIEW where REC = 'C000';


select ID_EMP,NAME,L_NAME,EMAIL,NAME_PST,NAME_DEP,NAME_PERM from EMPLOYEE 
join POSITION on PSTNO = POSITION.ID_PST
join DEPENTMENT on POSITION.P_DEPNO = DEPENTMENT.ID_DEP
join PERMISSION on POSITION.PERNO = PERMISSION.ID_PERM;

select DAY_SELECT,case when DAY_SELECT is not null then '1' else '0' end as A from INTERVIEW where REC = 'C003';

INSERT INTO INTERVIEW (
    ID_INVIEW,
    REC
) VALUES (
    'V003',
    'C003'
);





