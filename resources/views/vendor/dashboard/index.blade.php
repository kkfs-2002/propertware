
@extends('vendor.layouts.app')
@Section('content')

<div class="body-wrapper">
    <!--  App Topstrip -->
    <!-- <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="https://adminmart.com/" target="_blank">
            <img src="{{ asset('images/logos/logo4.png') }}" alt="Company Logo" width="60">
            
        </a>

       <div class="d-none d-xl-flex align-items-center gap-3">
          <a href="https://adminmart.com/support/"
            class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
            <i class="ti ti-lifebuoy fs-5"></i>
            Support
          </a>
          <a href="https://adminmart.com/"
            class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
            <i class="ti ti-gift fs-5"></i>
            Templates
          </a>
          <a href="https://adminmart.com/hire-us/"
            class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
            <i class="ti ti-briefcase fs-5"></i>
            Hire Us
          </a>
        </div> 
      </div>

      <div class="d-lg-flex align-items-center gap-2">
        <h3 class="text-white mb-2 mb-lg-0 fs-5 text-center">Check Modernize Premium Version</h3>
        <div class="d-flex align-items-center justify-content-center gap-2">
          <div class="dropdown d-flex">
            <a class="btn btn-outline-primary d-flex align-items-center gap-1" href="javascript:void(0)" id="drop3"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-device-laptop fs-5"></i>
              Live Preview
              <i class="ti ti-chevron-down fs-5"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop3">
              <div class="message-body">
                <a target="_blank" href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  Bootstrap Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-angular-material-dashboard/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  Angular Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-vuetify-vue-admin-dashboard/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  VueJs Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-next-js-admin-dashboard/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  NextJs Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-react-mui-dashboard-theme/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  React Preview
                </a>
                <a target="_blank"
                  href="https://adminmart.com/product/modernize-tailwind-nextjs-dashboard-template/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  Tailwind Preview
                </a>
              </div>
            </div>
          </div>
          <div class="dropdown d-flex">
            <a class="btn btn-primary d-flex align-items-center gap-1 " href="javascript:void(0)" id="drop4"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-shopping-cart fs-5"></i>
              Buy Now
              <i class="ti ti-chevron-down fs-5"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop4">
              <div class="message-body">
                <a target="_blank" href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  Bootstrap Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-angular-material-dashboard/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  Angular Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-vuetify-vue-admin-dashboard/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  VueJs Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-next-js-admin-dashboard/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  NextJs Preview
                </a>
                <a target="_blank" href="https://adminmart.com/product/modernize-react-mui-dashboard-theme/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  React Preview
                </a>
                <a target="_blank"
                  href="https://adminmart.com/product/modernize-tailwind-nextjs-dashboard-template/?ref=56"
                  class="dropdown-item d-flex align-items-center gap-1">
                  <i class="ti ti-external-link fs-5"></i>
                  Tailwind Preview
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div> -->
    <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">Sales Overview</h5>
                    </div>
                    <div>
                      <select class="form-select">
                        <option value="1">March 2025</option>
                        <option value="2">April 2025</option>
                        <option value="3">May 2025</option>
                        <option value="4">June 2025</option>
                      </select>
                    </div>
                  </div>
                  <div id="chart"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <!-- Yearly Breakup -->
                  <div class="card overflow-hidden">
                    <div class="card-body p-4">
                      <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                      <div class="row align-items-center">
                        <div class="col-7">
                          <h4 class="fw-semibold mb-3">$36,358</h4>
                          <div class="d-flex align-items-center mb-3">
                            <span
                              class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                              <i class="ti ti-arrow-up-left text-success"></i>
                            </span>
                            <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                            <p class="fs-3 mb-0">last year</p>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="me-4">
                              <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                              <span class="fs-2">2025</span>
                            </div>
                            <div>
                              <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                              <span class="fs-2">2024</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-5">
                          <div class="d-flex justify-content-center">
                            <div id="breakup"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <!-- Monthly Earnings -->
                  <div class="card">
                    <div class="card-body">
                      <div class="row alig n-items-start">
                        <div class="col-8">
                          <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                          <h4 class="fw-semibold mb-3">$6,820</h4>
                          <div class="d-flex align-items-center pb-1">
                            <span
                              class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                              <i class="ti ti-arrow-down-right text-danger"></i>
                            </span>
                            <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                            <p class="fs-3 mb-0">last year</p>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="d-flex justify-content-end">
                            <div
                              class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                              <i class="ti ti-currency-dollar fs-6"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="earning"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body p-4">
                  <div class="mb-4">
                    <h5 class="card-title fw-semibold">Recent Transactions</h5>
                  </div>
                  <ul class="timeline-widget mb-0 position-relative mb-n5">
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                      <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
                      <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                      </div>
                      <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe of $385.90</div>
                    </li>
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                      <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                      <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                      </div>
                      <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                          href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                      </div>
                    </li>
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                      <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                      <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                      </div>
                      <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to Michael</div>
                    </li>
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                      <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                      <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                      </div>
                      <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                          href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                      </div>
                    </li>
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                      <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                      <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                      </div>
                      <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival recorded
                      </div>
                    </li>
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                      <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                      <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                      </div>
                      <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                    <div class="mb-3 mb-sm-0">
                      <h4 class="card-title fw-semibold">Top Performers</h4>
                      <p class="card-subtitle">Best Employees</p>
                    </div>
                    <div>
                      <select class="form-select">
                        <option value="1">March 2025</option>
                        <option value="2">April 2025</option>
                        <option value="3">May 2025</option>
                        <option value="4">June 2025</option>
                      </select>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-middle text-nowrap mb-0">
                      <thead>
                        <tr class="text-muted fw-semibold">
                          <th scope="col" class="ps-0">Assigned</th>
                          <th scope="col">Project</th>
                          <th scope="col">Priority</th>
                          <th scope="col">Budget</th>
                        </tr>
                      </thead>
                      <tbody class="border-top">
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="../assets/images/profile/user-3.jpg" class="rounded-circle" width="40"
                                  height="40" alt="modernize-img" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Web Designer
                                </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Elite Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-primary-subtle text-primary">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$3.9K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="../assets/images/profile/user-5.jpg" class="rounded-circle" width="40"
                                  height="40" alt="modernize-img" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">John Deo</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Web Developer
                                </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Flexy Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-warning-subtle text-warning">Medium</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$24.5K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="../assets/images/profile/user-7.jpg" class="rounded-circle" width="40"
                                  height="40" alt="modernize-img" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Yuvraj Sheth</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Project Manager
                                </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Xtreme Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-success-subtle text-success">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$4.8K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="border-0 ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="../assets/images/profile/user-6.jpg" class="rounded-circle" width="40"
                                  height="40" alt="modernize-img" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Micheal Doe</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Content Writer
                                </p>
                              </div>
                            </div>
                          </td>
                          <td class="border-0">
                            <p class="mb-0 fs-3">Helping Hands WP Theme</p>
                          </td>
                          <td class="border-0">
                            <span class="badge fw-semibold py-1 w-85 bg-danger-subtle text-danger">High</span>
                          </td>
                          <td class="border-0">
                            <p class="fs-3 text-dark mb-0">$9.3K</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg"
                      class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)"
                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                      class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">$50 <span
                        class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
                    <ul class="list-unstyled d-flex align-items-center mb-0">
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../assets/images/products/s5.jpg"
                      class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)"
                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                      class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">$650 <span
                        class="ms-2 fw-normal text-muted fs-3"><del>$900</del></span></h6>
                    <ul class="list-unstyled d-flex align-items-center mb-0">
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../assets/images/products/s7.jpg"
                      class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)"
                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                      class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">$150 <span
                        class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
                    <ul class="list-unstyled d-flex align-items-center mb-0">
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../assets/images/products/s11.jpg"
                      class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)"
                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                      class="ti ti-basket fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">Cute Soft Teddybear</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">$285 <span
                        class="ms-2 fw-normal text-muted fs-3"><del>$345</del></span></h6>
                    <ul class="list-unstyled d-flex align-items-center mb-0">
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                      <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
    @endsection