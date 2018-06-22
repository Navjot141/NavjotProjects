import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { MapPageComponent } from './pages/map-page/map-page.component';
import {ApicallsService} from './service/apicalls.service';
import {JobSetGetService} from './service/job-set-get.service';
import {RouterModule, Routes} from '@angular/router';
import {HttpModule} from '@angular/http';
import { NavBarComponent } from './partial/nav-bar/nav-bar.component';
import {FormsModule} from '@angular/forms';


const appRoutes: Routes = [
  { path: '', redirectTo: '/home', pathMatch: 'full' },
  { path: 'home', component: HomePageComponent },
  {
    path: 'map', component: MapPageComponent
  }
];

@NgModule({
  declarations: [
    AppComponent,
    HomePageComponent,
    MapPageComponent,
    NavBarComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule, RouterModule.forRoot(
      appRoutes,
      { enableTracing: true } // <-- debugging purposes only
    )
  ],
  providers: [ApicallsService, JobSetGetService],
  bootstrap: [AppComponent]
})
export class AppModule { }
