# ci3crud

1.下載專案到 xampp/htdocs/ 目錄下</br>

```
git clone https://github.com/CODEbyPoHsiang/ci3crud
```
2.到資料夾底下 `cd ci3crud`</br>

3.安裝 composer</br>
```
composer install
```
4.codeigniter 歡迎畫面
```
http://localhost/ci3crud/   \\(本機網址/專案資料夾名稱/)
```
5.CRUD 網頁
```
http://localhost/ci3crud/Member   \\(本機網址/專案資料夾名稱/crud控制器名稱)
```
---
API使用

* 資料顯示API (GET)
```
http://localhost/ci3crud/Member/all
```
* 新增資料API (POST)
```
http://localhost/ci3crud/Member/add
```
* 查看單一筆資料 (GET)
```
http://localhost/ci3crud/Member/ajax_edit/{id}
```
* 修改資料 (PUT)
```
http://localhost/ci3crud/Member/update/{id}//有問題 等待處理
```
* 刪除資料 (DELETE)
```
http://localhost/ci3crud/Member/delete/{id} 
```
