var Lotto = [6];






function isDuplicate(currentNum, lottoArray) {

	var num, phpjslocvar_0;

	for (phpjslocvar_0 in lottoArray) {
	    num = lottoArray[phpjslocvar_0];

		if (currentNum == num) {

			return true;

		}

	}

	return false;

}



for (var i = 0; i<6; i++)
{
    
    
    var randValue = 0;
    
    
    do {
     randValue = Math.floor((Math.random() * 47)+ 1);
    } while (isDuplicate(randValue, Lotto));
    
    Lotto.push(randValue);
    
    
}

Lotto.sort();

for(var j = 0; j<6; j ++)
{
    document.write(Lotto[j]);
    document.write("  ");
}

    
