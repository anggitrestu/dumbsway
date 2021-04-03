#include <iostream>
using namespace std;
int main(){
    string keyword[10] = {"D","U","M","B","W","A","Y","S","I","D"};
    for (int i = 0; i < 7; i++) {
        for (int j = 0; j< 10; j++ ) {
    
            if(i == 2 || i == 4) {
                if (j % 2 == 0){
                    cout << "* ";
                } else {
                    cout << "= ";
                }
            } else if(i==3) {
                cout << keyword[j] << " ";
            }
            else {
                if (j % 2 == 0){
                    cout << "= ";
                } else {
                    cout << "* ";
                }
            }
           
        }
        cout << endl;
    }

}