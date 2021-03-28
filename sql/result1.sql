create view result1 as
select
	sa.induk as idakun
    , sum(debit) as debit
    , sum(kredit) as kredit
    , akun.induk
from
	saldoawal sa
    left join t98_akun akun on sa.induk = akun.idakun
group by
	sa.induk
