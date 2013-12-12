<style>
.date
{
width: 40px;
}
</style>
<!DOCTYPE html>
<html>
    <head>
        <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
        // See http://stackoverflow.com/questions/4881938/javascript-calculate-number-of-days-in-month-for-a-given-year
        Date.prototype.daysInMonth = function(year, month) { 
            var monthStart  = new Date(year, month, 1);
            var monthEnd    = new Date(year, month + 1, 1);
            var monthLength = Math.round((monthEnd - monthStart) / (1000 * 60 * 60 * 24));
            
            var mm  = ((month + 1) < 10) ? ('0' + (month + 1)) : (month + 1);
            var ret = new Array();
            for (var i = 1; i <= monthLength; i++) {
                var dd = (i < 10) ? ('0' + i) : i;
                ret.push(new Date(year, month,i));
            }
            return ret;
        };        

        function addRows(table, dates,year,month){
        
            var idx = 1;
            
            
			var j=0;
			
			for (var j=0; j<10; j++)
			{
			table.append('<tr>');
      		switch (j)
          {
          case 0:
          	table.append('<th>Uren</th>')
            break;
          case 1:
          	table.append('<td>Facturabel</td>')
            break;
          case 2:
          	table.append('<td>ALMG</td>')
            break;
          case 3:
          	table.append('<td>Overuren</td>')
            break;  
          case 4:
          	table.append('<td>Studie</td>')
            break;
          case 5:
          	table.append('<td>Verlof</td>')
            break;
          case 6:
          	table.append('<td>Ziekte</td>')
            break;
          case 7:
          	table.append('<td>ATV</td>')
            break;
          case 8:
          	table.append('<td>Totaal</td>')
            break;
          case 9:
            table.append('<td colspan '+i+'><input type='submit' 
             value='reg'
             name='submit' /></td>')
            break;
          default:
          	return;
          }
          
            for (var i in dates) {
				
				if(j==0)
					{
          var d = dates[i].getDay();
          	switch(d)
            {
            case 0:
              d="Zo"
              break;
            case 1:
              d="Ma"
              break;
            case 2:
              d="Di"
              break;
            case 3:
              d="Wo"
           		break;
            case 4:
            	d="Do"
              break;
            case 5:
            	d="Vr"
              break;
            case 6:
            	d="Za"
              break;
            default:
             	d="error"              
           }
          	table.append('<th>'+d+'<br />'+dates[i].getDate()+'</th>');
					}
					else
					{
                table.append('<td><input name="date'+idx+'" id="date'+idx+'" 		class="date"></td>');
                
				}
				idx++;
				}
			table.append('</tr>');
			}

        
		}
       
    function addRows1(table1, dates,year,month){   		
            var idx = 1;           
						var j=0;
			
			for (var j=0; j<6; j++)
			{
			table1.append('<tr>');
      		switch (j)
          {
          case 0:
          	table1.append('<th>Kilometers</th>')
            break;
          case 1:
          	table1.append('<td>Facturabel</td>')
            break;
          case 2:
          	table1.append('<td>ALMG</td>')
            break;
          case 3:
          	table1.append('<td>Prive</td>')
            break;  
          case 4:
          	table1.append('<td>Totaal</td>')
            break;
          default:
          	return;
          }
          
            for (var i in dates) {
				
				if(j==0)
					{
          	//var date = new Date(dates[i]);
            
            //var dow = date.getDay();
            //console.log(dow+" "+date)
            
            var d = dates[i].getDay();
          	switch(d)
            {
            case 0:
              d="Zo"
              break;
            case 1:
              d="Ma"
              break;
            case 2:
              d="Di"
              break;
            case 3:
              d="Wo"
           		break;
            case 4:
            	d="Do"
              break;
            case 5:
            	d="Vr"
              break;
            case 6:
            	d="Za"
              break;
            default:
             	d="error"              
           }
            
          	table1.append('<th>'+d+'<br />'+dates[i].getDate()+'</th>');
					}
					else
					{
            table1.append('<td><input name="date'+idx+'" id="date'+idx+'" class="date" ></td>');
                
				}
					idx++;
				}
			table1.append('</tr>');
			}       
		}
    $(function fillHours() {
            var myDate = new Date();
            var year   = myDate.getFullYear();
            var month  = myDate.getMonth();
            var day		 = myDate.getDate();
            //var dow 	 = myDate.getDay(month,year);
            var dates  = myDate.daysInMonth(year, month);
            var table  = $("#uren_table").find("tbody");
            var table1 = $("#km_table").find("tbody");
            addRows(table, dates);
            addRows1(table1, dates, year, month);
        });
       
		
        
        </script>       
    </head>
    <body>
        <form action='./table' method='post'>
          <table id="uren_table">            
            <tbody>
            </tbody>
          </table>
        </form>
        <br/>
    
        <form action='./table' method='post'>
          <table id="km_table">            
            <tbody>
            </tbody>
          </table>
        </form>
    </body>
 