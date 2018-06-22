import { Injectable } from '@angular/core';
import {Bpuser} from '../model/bpuser';

@Injectable()
export class BpuserSetGetService {

  private _user: Bpuser;
  private _users: Bpuser[] = [];
  constructor() { }
  get user(): Bpuser {
    return this._user;
  }
  get users(): Bpuser[] {
    return this._users;
  }
  set user(value: Bpuser) {
    this._user = value;
  }
  set users(value: Bpuser[]) {
    this._users = value;
  }

}
