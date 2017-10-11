%%% face recognition by Kalyan Sourav Dash %%%
clear all
close all
clc
javaaddpath('C:\Program Files (x86)\MySQL\mysql-connector-java-5.1.28.jar')
    %# connection parameteres
    host = 'localhost'; %MySQL hostname
    user = 'root'; %MySQL username
    password = '';%MySQL password
    dbName = 'db_personmanage'; %MySQL database name
    %# JDBC parameters
    jdbcString = sprintf('jdbc:mysql://%s/%s', host, dbName);
    jdbcDriver = 'com.mysql.jdbc.Driver';
 conn = database(dbName, user , password, jdbcDriver, jdbcString); 
 if isconnection(conn)

%%%%%%%  provide the data path where the training images are present  %%%%%%%
%%% if your matlab environment doesn't support 'uigetdir' function
%%% change those lines in code for datapath and testpath as :
% datapath = 'give here the path of your training images';
% testpath = 'similarly give the path for test images';
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
datapath ='C:\xampp\htdocs\person_managing\personimage';
% testpath = uigetdir('C:\Documents and Settings\KsDash\My Documents\MATLAB','select path of test images');
% [files,path]= uigetfile('*.jpg','select path of test images');
path='C:\xampp\htdocs\person_managing\unknown';


% prompt = {'Enter test image name (a number between 1 to 10):'};
% dlg_title = 'Input of PCA-Based Face Recognition System';
% num_lines= 1;
% def = {' '};
% TestImage = inputdlg(prompt,dlg_title,num_lines,def);
% TestImage = strcat(testpath,'\',char(TestImage),'.jpg');

%  qry = sprintf('INSERT INTO spam(word,frequency,temp,type_sp) VALUES("abin","11","12","sdds")');
%  display(qry);
%  fetch(exec(conn, qry));
while(1)
	result = get(fetch(exec(conn, 'SELECT pic from tbl_unknown where status="n"')),'Data');
	disp(result);
    if (~strcmp(result,'No Data'))
    k=char(cell2mat(result));    
    ff=fullfile(path,k);
 
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%%%%%%%%%%%%%  calling the functions  %%%%%%%%%%%%%%%%%%%%%%%%

recog_img = facerecog(datapath,ff);
qry= sprintf('UPDATE `tbl_unknown` SET `status`="y",`result`="%s" WHERE `pic`="%s"', recog_img,k);
get(fetch(exec(conn,qry)));
% selected_img = strcat(datapath,'\',recog_img);
% select_img = imread(selected_img);
% imshow(select_img);
% title('Recognized Image');
% test_img = imread(ff);
% figure,imshow(test_img);
% title('Test Image');
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
result = strcat('the recognized image is : ',recog_img);
disp(result);
    else
       disp('no data'); 
    end
    pause(1)
end
else
    display('MySql Connection Error');
 end