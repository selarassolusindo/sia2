create view v01_bukubesar as
select
	akun.*
    , case when r7.debit is null then 0 else r7.debit end as debit
    , case when r7.kredit is null then 0 else r7.kredit end as kredit
from
	t98_akun akun
    left join result7 r7 on akun.idakun = r7.idakun
