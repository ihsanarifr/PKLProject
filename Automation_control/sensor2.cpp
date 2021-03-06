#include<iostream>
#include<stdlib.h>
#include<stdio.h>
#include<sys/stat.h>
#include<fcntl.h>
#include<unistd.h>

using namespace std;

//const char AIN_DEV[] = '/sys/devices/ocp.2/helper/14/AIN0';
const char AIN_DEV[] = "/sys/bus/iio/devices/iio:device0/in_voltage3_raw";

double CtoF(double c)
{
	return(c * 9.0 / 5.0) + 32.0;
}

double temperature(char *string)
{
	int value = atoi(string);
	double milivolts = (value / 4096.0) * 1800;
	double temperature = (milivolts) / 10.0;
	return temperature;
}
int main()
{
	int fd = open(AIN_DEV, O_RDONLY);
	
	//while(1)
	//{
		char buffer[1024];
		int ret = read(fd, buffer, sizeof(buffer));
		if(ret != -1)
		{
			buffer[ret] = '\0';
			double celsius = temperature(buffer);
			double fahrenheit = CtoF(celsius);
			printf("%0.2f %0.2f\n",celsius,fahrenheit);
			lseek(fd, 0, 0);
		}
		sleep(1);
	//}
	close(fd);
	return 0;
}
