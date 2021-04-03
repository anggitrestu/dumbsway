#include <iostream>
using namespace std;

int hargaTelur = 2500;
int bonus = 0;
bool ganjilBukanPrima = false;
int tglPrima[10] = {2, 3, 5, 7, 11, 13, 17, 19, 23, 29};
int tgl, jmlBeli, jmlTelur;

void hitungJmlTelur(int paramTgl, int paramTotalUang);

int main()
{

    cout << "Masukan Tanggal Pembelian : ";
    cin >> tgl;
    if (tgl > 31) {
        cout << " harap Masukan tanggal yang benar\n\n";
        system("PAUSE");
        exit(0);
    }
    cout << "Masukan Jumlah Uang Pembelian : ";
    cin >> jmlBeli;
    hitungJmlTelur(tgl, jmlBeli);
}

// ungsi untuk mencari jumlah telur sesuai pembelian
void hitungJmlTelur(int paramTgl, int paramTotalUang)
{
    bool foundTglPrima = true;
    jmlTelur = paramTotalUang / hargaTelur;
    // perulangan untuk mengcek apakah tanggal prima
    for (int i = 0; i <= 9; i++)
    {
        if (tgl == tglPrima[i])
        {
            // found tgl prima berfungsi agar tidak menjalankan fungsu setelahnya
            foundTglPrima = false;
            if (jmlTelur >= 12)
            {
                int lusin = jmlTelur / 12;
                bonus = 2 * lusin;
                jmlTelur = jmlTelur + bonus;
            }
        }
    }
// jika found tgl prima berniali true maka menjalan kode di bawah ini
// tujuannya adalah mencari tanggal genap yang bukan bil prima
    if (foundTglPrima)
    {
        if (tgl % 2 == 1)
        {
            cout << tgl % 2;
            ganjilBukanPrima = true;
        }
    }

    if (ganjilBukanPrima)
    {
        if (jmlTelur >= 12)
        {
            int lusin = jmlTelur / 12;
            bonus = 3 * lusin;
            jmlTelur = jmlTelur + bonus;
        }
    }
    if (tgl % 5 == 0)
    {
        if (bonus % 2 == 0)
        {
            bonus = bonus * 10;
            jmlTelur = jmlTelur + bonus;
        }
        else if (bonus % 2 == 1)
        {
            bonus = bonus * 5;
            jmlTelur = jmlTelur + bonus;
        }
    }
    if(bonus == 0) {
        cout << "Maaf anda belum beruntung mendapatkan bonus\n"
             << "Kembalilah di tanggal prima untuk mendapatkan bonus\n\n";
    } else {
    cout << "selamat! Anda mendapatkan bonus telur berjumlah : " << bonus << endl;
     cout << "sebelum dijumlahkan dengan bonus : " << jmlTelur - bonus;
    }
   
    cout << "\nJumlah telur yang anda dapatkan adalah : " << jmlTelur;
}