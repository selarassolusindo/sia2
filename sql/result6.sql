create view result6 as
select
	r.induk as idakun
    , sum(debit) as debit
    , sum(kredit) as kredit
    , akun.induk
from
	(
	select * from result5
	union
	select * from result4
	union
	select * from result3
	union
	select * from result2
	union
	select * from result1
	union
	select * from saldoawal
	) r
    left join t98_akun akun on r.induk = akun.idakun
group by
	r.induk
