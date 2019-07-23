#include<stdio.h>
#include<stdlib.h>
#include<string.h>

char flag[100];

void cat_flag(){
  FILE *sec;
  sec=fopen("../flag","r");
  fscanf(sec,"%s",flag);
  printf("<h4 style='font-family: M30W'>%s</h4>",flag);
  return;
}

void cat_print(char *name){
  printf("<h4 style='font-family: M30W'>%s</h4>",name);
  return;
}

int main(){
  char *query;
  char name[64] = {'\0'};
  char key[64] = {'Y','0','U','5','H','A','l','1','N','0','T','S','E','E','I','T','!','\0'};
  puts("Content-type: text/html\n");
  puts("<html>");
  puts("<head>");
  puts("<title>Catify</title>");
  puts("<meta charset='utf-8'>");
  puts("<meta name='viewport' content='width=device-width, initial-scale=1'>");
  puts("<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>");
  puts("<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>");
  puts("<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>");
  puts("<link rel='stylesheet' type='text/css' href='/main.css'>");
  puts("</head>");
  puts("<body>");
  puts("<div class='container' style='padding: 10px'>");
  puts("<h2 style='font-family: M30W'>Catifier</h2>");
  puts("<br>");
  puts("<br>");
  puts("<p>Do you want a fancy cat-styled name?</p>");
  puts("<p>Let us generate it for you!</p>");
  puts("<br>");
  puts("<form class='form-inline' action method='GET'>");
  puts("<div class='form-group'>");
  puts("<input class='form-control' type='text' name='name' placeholder='name'>");
  puts("</div>");
  puts("<br>");
  puts("<br>");
  puts("<button type='submit' class='btn btn-primary'>Decorator</button>");
  puts("</form>");
  query = getenv("QUERY_STRING");
  sscanf(query,"name=%s",name);
  if(name[0]!='\0'){
    if(strcmp(key,"H0WT0M0D1FYTH3K3Y")==0)
      cat_flag();
    else
      cat_print(name);
  }
  puts("</div>");
  puts("<!--Notes: I originally placed my cgi under the normal /var/www/html/ path, but it turns out that each OS defines a very different default path for it, interesting huh?-->");
  puts("</body>");
  puts("</html>");
  return 0;
}
