package Tests;

import static org.junit.Assert.*;

import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;

public class LoginTests {

	@Test
	public void login() {
        // The Firefox driver supports javascript 
        WebDriver driver = new FirefoxDriver();
        
        // Go to Login page
        driver.get("http://localhost/auscert/");
        
        // Enter the username and password then login
        WebElement email = driver.findElement(By.name("loginEmail"));
        email.sendKeys("cameronpaulsen0@gmail.com");
        WebElement password = driver.findElement(By.name("loginPassword"));
        password.sendKeys("admin");
        password.sendKeys(Keys.ENTER);
        assertEquals("AusCert | Dashboard", driver.getTitle());
        
	}

}
