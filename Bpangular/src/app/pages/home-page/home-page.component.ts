import { Component, OnInit } from '@angular/core';
import {Bpuser} from '../../model/bpuser';
import {ApicallsService} from '../../service/apicalls.service';
import {Router} from '@angular/router';
import {BpuserSetGetService} from '../../service/bpuser-set-get.service';
import {BpuserAdd} from '../../model/bpuser-add';

import {promise} from 'selenium-webdriver';


@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent implements OnInit {
  Bpusers:  Bpuser[] = this.Bpuserset.users;
  model = new BpuserAdd('', '', '','navjot@yahoo.com');
  error_message = '';
  constructor(public apiProvider: ApicallsService, public router: Router, public Bpuserset: BpuserSetGetService) {
  }

  ngOnInit() {
      this.apiProvider.getCareerJetResults()
        .subscribe((Bpusers) => {
            this.Bpuserset.users = Bpusers;
            this.Bpusers = this.Bpuserset.users;
          },
          (error) => {
            this.error_message = <string>error;
          });
    }
     formSubmit() {
      this.apiProvider.setCareerJetResults(this.model.Date, this.model.Tg, this.model.TSH, this.model.user)
        .subscribe((Bpusers) => {
          console.log(Bpusers);
          });
    }
  }
