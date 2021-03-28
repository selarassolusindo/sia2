create view result5 as
select
	r4.induk as idakun
    , sum(debit) as debit
    , sum(kredit) as kredit
    , akun.induk
from
	result4 r4
    left join t98_akun akun on r4.induk = akun.idakun
group by
	r4.induk
