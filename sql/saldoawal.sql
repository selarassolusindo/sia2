create view saldoawal as
select
	sa.idakun
    , sa.debit
    , sa.kredit
    , akun.induk
from
	t97_saldoawal sa
    left join t98_akun akun on sa.idakun = akun.idakun
