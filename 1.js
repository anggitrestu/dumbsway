const readline = require('readline').createInterface({
  input: process.stdin,
  output: process.stdout,
});

const bungaBank = (tabungann) => {
  let saldoAwal = tabungann;
  let saldoAkhir;
  for (let i = 0; i < 12; i++) {
    let hasilBunga = saldoAwal * 0.025;
    saldoAwal = saldoAwal + hasilBunga;
    saldoAkhir = saldoAwal.toFixed(2);
    console.log(`Saldo bulan ke- ${i + 1} : Rp. ${saldoAkhir}`);
  }
  return saldoAkhir;
};

readline.question('Masukan Jumlah tabungan anda : ', (tabungan) => {
  const a = parseInt(tabungan);
  console.log(`jadi saldo akhir anda senilai : Rp.` + bungaBank(a));
  readline.close();
});
