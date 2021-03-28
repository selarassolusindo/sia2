create view result3 as
select
	r2.induk as idakun
    , sum(debit) as debit
    , sum(kredit) as kredit
    , akun.induk
from
	result2 r2
    left join t98_akun akun on r2.induk = akun.idakun
group by
	r2.induk
