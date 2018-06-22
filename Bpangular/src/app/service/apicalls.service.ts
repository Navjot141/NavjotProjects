import { Injectable } from '@angular/core';
import {Http, RequestOptions, Response, URLSearchParams} from '@angular/http';
import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import {Bpuser} from '../model/bpuser';


@Injectable()
export class ApicallsService {
  synrecordURL = 'http://dev.cs.smu.ca:8310/SyncRecords';
  getrecordURL = 'http://dev.cs.smu.ca:8310/getRecords';

  constructor(public http: Http) {
    this.getCareerJetResults();
  }

  // make a http call to public API and return and return an observable
  setCareerJetResults(Date, Tg, TSH, user) {
    const bprecord = {
      'Date': Date,
      'Tg': Tg,
      'TSH': TSH
    };
    const userinfo = {
      'email': 'navjot@yahoo.com',
      'password': '1234',
      newRecords: [bprecord]
    };
    console.log(userinfo);
    return this.http.post(this.synrecordURL, userinfo).map((response: Response) => <Bpuser[]> response.json());
  }

  getCareerJetResults() {
    const userinfo = {
      'email': 'navjot@yahoo.com',
      'password': '1234'
    };
    console.log(userinfo);
    return this.http.post(this.getrecordURL, userinfo).map((response: Response) => <Bpuser[]> response.json());
  }
}

