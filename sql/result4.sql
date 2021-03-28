create view result4 as
select
	r3.induk as idakun
    , sum(debit) as debit
    , sum(kredit) as kredit
    , akun.induk
from
	result3 r3
    left join t98_akun akun on r3.induk = akun.idakun
group by
	r3.induk
