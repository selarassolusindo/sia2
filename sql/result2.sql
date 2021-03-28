create view result2 as
select
	r1.induk as idakun
    , sum(debit) as debit
    , sum(kredit) as kredit
    , akun.induk
from
	result1 r1
    left join t98_akun akun on r1.induk = akun.idakun
group by
	r1.induk
